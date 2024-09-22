import DOMPurify from 'dompurify';
import { marked } from 'marked';

export default function markdown(text) {
    return DOMPurify.sanitize(marked(text.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/, "")));
}
