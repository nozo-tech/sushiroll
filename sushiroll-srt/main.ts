import "jsr:@std/dotenv/load";
import * as path from "jsr:@std/path";
import { Application, Router } from "https://deno.land/x/oak/mod.ts";
import { exec } from "https://deno.land/x/exec/mod.ts";

const SUSHIROLL_LIVE_API_URL = Deno.env.get("SUSHIROLL_API_URL");

// Define the router and app
const router = new Router();
const app = new Application();

// API endpoint for users to retrieve the SRT ingest URL (for use in OBS)
router.get("/ingest-url/:userId", (context) => {
    const { userId } = context.params;

    // Provide the SRT ingest URL for the user to input into OBS
    const srtUrl = `srt://your-app-ip:9000?streamid=${userId}`;
    context.response.body = { srtUrl };
});

// FFmpeg process to handle the incoming SRT stream and convert to HLS
async function handleSRTStream(userId: string) {
    const hlsPath = Deno.env.get('SUSHIROLL_') + `/streams/${userId}/index.m3u8`;

    await Deno.mkdir(path.dirname(hlsPath), { recursive: true });

    // FFmpeg command to listen to the SRT stream from OBS and convert it to HLS
    const command = `ffmpeg -i "srt://127.0.0.1:9000?mode=listener&streamid=${userId}" -c:v libx264 -f hls -hls_time 2 -hls_list_size 6 -hls_flags delete_segments "${hlsPath}"`;

    const ffmpegProcess = exec(command);
    console.log(`Ingesting SRT stream from user ${userId}...`);

    // Notify Laravel app that the stream has started
    // await updateLivestreamStatus(userId, "started");

    // Handle stream cleanup when process stops
    ffmpegProcess.then(async () => {
        // await updateLivestreamStatus(userId, "stopped");
        console.log(`Livestream for user ${userId} has ended.`);
    }).catch((err) => {
        console.error("Error in FFmpeg process:", err);
    });
}

// Function to update the livestream status in the Laravel API
async function updateLivestreamStatus(userId: string, status: string) {
    const apiUrl = `https://0.0.0.0/api/private/livestream/status`;

    const response = await fetch(apiUrl, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": "Bearer YOUR_API_TOKEN", // Add authorization if needed
        },
        body: JSON.stringify({
            userId,
            status,
        }),
    });

    if (!response.ok) {
        console.error(`Failed to update livestream status for user ${userId}:`, await response.text());
    }
}

// Route to manually trigger stream handling (can be triggered when OBS connects)
router.post("/start-ingest/:userId", (context) => {
    const { userId } = context.params;

    // Clean up previous stream files if they exist
    try {
        Deno.removeSync(`./streams/${userId}`, { recursive: true });
    } catch {
        console.info(`No previous stream files found for user ${userId}.`);
    }

    // Start the FFmpeg process to handle the incoming SRT stream
    handleSRTStream(userId);

    context.response.body = { message: `SRT ingest for user ${userId} started.` };
});

// Route to manually stop the stream handling process
router.post("/stop-ingest/:userId", (context) => {
    const { userId } = context.params;

    // Stop the FFmpeg process for the user's stream
    exec("pkill -f srt://127.0.0.1:9000?mode=listener&streamid=" + userId);

    context.response.body = { message: `SRT ingest for user ${userId} stopped.` };

    // Clean up the stream files
    Deno.removeSync(`./streams/${userId}`, { recursive: true });

    // Notify Laravel app that the stream has stopped
    // updateLivestreamStatus(userId, "stopped");
});

// Start the server
app.use(router.routes());
app.use(router.allowedMethods());

console.log("SRT ingest server running on http://localhost:8000");
await app.listen({ port: 8000 });
