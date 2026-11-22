# Deploying every cup. to Vercel

This Symfony app is packaged as a FrankenPHP container. Import the GitHub repository in Vercel with the repository root as the project root. The root `Dockerfile` and `vercel.json` route the app through Symfony's `public/index.php` front controller.

## Required Vercel environment variables

Set these for Production and Preview in **Project Settings → Environment Variables**:

- `APP_ENV`: `prod`
- `APP_DEBUG`: `0`
- `APP_SECRET`: a unique, randomly generated value; keep it in Vercel and out of Git
- `DEFAULT_URI`: the public site URL, for example `https://your-domain.example`

Redeploy after adding or changing environment variables. Do not use the build-only placeholder from the Dockerfile as the production `APP_SECRET`.

## Before accepting real orders or bookings

The menu cart, checkout proof preview, and booking interface currently run in the browser. They do not submit orders, uploaded payment images, or booking requests to Symfony. Add a server endpoint and connect it to durable services before treating those forms as live:

- A database for orders and booking requests
- Object storage for uploaded payment proof images
- A real payment QR and a process for reviewing submitted payments

Vercel container filesystems are not durable storage. Keep order data and uploads in managed external services rather than writing them under the app directory.
