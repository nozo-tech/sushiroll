# Software Requirements Specification (SRS) for Sushiroll

## 1. Introduction

### 1.1 Purpose

Sushiroll is a next-generation social platform designed to combine the best features of YouTube, Twitch, Reddit, and Twitter while removing their negative aspects. This document specifies the functional and non-functional requirements of Sushiroll in accordance with the IEEE 830 standard.

### 1.2 Document Conventions

- All headings are formatted using `###` to denote sections.
- Functional requirements are listed numerically.
- Non-functional requirements are prefixed with `NF-`.

### 1.3 Intended Audience and Reading Suggestions

This document is intended for the following stakeholders:

- **Development Team:** To implement the system as per requirements.
- **Project Managers:** To oversee progress and feature implementation.
- **End Users:** To understand how the system will work.
- **Investors and Stakeholders:** To evaluate the project’s viability.

### 1.4 Product Scope

Sushiroll aims to:

- Provide a **user-first** experience with intuitive content sharing.
- Implement most of YouTube’s, Twitch’s, Reddit’s, and Twitter’s positive features.
- Avoid algorithmic biases and provide a customizable recommendation engine.
- Introduce **"Rolls" (videos), "Threads" (posts/discussions), and "Communities"** for content organization.
- Support **NSFW content labeling** to allow filtering or hiding based on user preference.
- Offer a **progressive monetization model** where smaller creators take 80% of ad revenue, scaling to a 40% platform cut for top creators.
- Require **invite codes** from existing channel-enabled users for new users to create a channel, ensuring a safer community free from bots, AI, and scammers.
- Implement a **"Contributing Users and Channels"** feature where users can subscribe to a monthly payment, or channels can opt to give up a portion of their revenue split, to unlock more advanced features in the platform (to be defined later in development).

## 2. Overall Description

### 2.1 Product Perspective

Sushiroll is a **standalone web application** with a mobile-first design. It will integrate:

- **Video Hosting & Streaming** (similar to YouTube/Twitch)
- **Thread-Based Discussions** (like Reddit)
- **Quick Status Updates & Trending Topics** (like Twitter)
- **Monetization System** with progressive revenue sharing

### 2.2 Product Functions

|Feature|Description|
|---|---|
|Rolls|Video content, equivalent to YouTube videos|
|Threads|Posts and discussions, public or community-based|
|Channels|User-owned spaces for content publication (requires invite code to create)|
|Communities|Groups of users sharing common interests|
|Channel Groups|Collaborative content groups, like VTuber agencies|
|NSFW Content|Marked content is blurred/hidden based on settings|
|Progressive Monetization|Smaller creators take 80% revenue, up to 40% for top creators|
|Contributing Users and Channels|Users or channels can subscribe or give up part of revenue for advanced features|

### 2.3 User Characteristics

Users are expected to have basic knowledge of social media platforms and content sharing. The system should cater to **creators**, **viewers**, and **community managers** with various interaction levels.

### 2.4 Constraints

- No child-focused content.
- NSFW content **must** be labeled appropriately.
- Revenue model must ensure **fair distribution**.
- Not all users are eligible to create a channel; an invite code is required to gain access to this feature.

## 3. Specific Requirements

### 3.1 Functional Requirements

1. The system shall allow users to **upload and stream videos (Rolls)**.
2. The system shall provide a **customizable recommendation engine**.
3. The system shall allow **creating and managing threads (posts & discussions)**.
4. The system shall support **livestreams**.
5. The system shall enable **user-created communities**.
6. The system shall enforce **NSFW labeling** at content upload.
7. The system shall offer **monetization options based on creator size**, starting at an 80% revenue share.
8. The system shall require an **invite code for users to create a channel**, preventing abuse by bots, AI, and scammers.
9. The system shall offer a **"Contributing Users and Channels" feature**, allowing users to subscribe to a monthly plan or channels to give up part of their revenue to unlock advanced features.

### 3.2 Non-Functional Requirements

NF-1. The platform must ensure **high availability** with 99.9% uptime. NF-2. The system must **scale** to support millions of users. NF-3. The UI should be **mobile-first and responsive**. NF-4. NSFW content must be **blurred by default** and optionally hidden. NF-5. The recommendation engine must be **transparent and customizable**.

## 4. Appendices

- **A. Glossary**
    - **Rolls**: Video content.
    - **Threads**: Text-based discussions.
    - **Channels**: User profiles for publishing content (invite required for creation).
    - **Communities**: User groups for discussions.
    - **Channel Groups**: Collaborative content teams.
    - **Contributing Users and Channels**: A system for unlocking advanced features via subscription or revenue split.