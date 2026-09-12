# Piglet Hunt
The first open-source private server for the abandoned Steam game PIGGY: Hunt

---

## Requirements     

Make sure you have the following installed:

- UwAmp Wamp Server [(Download)](https://www.uwamp.com/file/UwAmp.exe)
- HxD [(Download)](https://mh-nexus.de/en/hxd/)
- PIGGY: Hunt Client [(Download)](https://mega.nz/folder/1qt02byb#ZxDqEQh3sZLvNCPRpeY4yw)

---

## UwAmp Setup

1. Download and install **UwAmp**.

2. Launch **UwAmp**.

3. Start the **Apache** service.

4. Navigate to:

   ```
   C:\UwAmp\www
   ```

5. Copy all files from this repository into the **www** folder.

6. Ensure that Apache is running and accessible on port **80** (HTTP) or **443** (HTTPS).

7. Verify your setup by opening your server URL in a web browser.

---

## Application Setup

* In your **PIGGY: Hunt** application folder, navigate to **piggy-hunt_Data** and open **resources.assets** in a hex editor (such as HxD). Replace **api.beamable.com** with your own URL. If your URL is shorter than the original, pad the remaining space with forward slashes (`/`). If the client does not connect and your web server is not using **HTTPS**, change your URL to use **http** instead of **https**.

* Finally, you can launch the exe and you should connect to our own PIGGY: Hunt server!

---

## PubNub Setup

* Go to https://pubnub.com and create your own account/login to your own account, create and grab your prototype credentials and add them into the /basic/notification.php file.

---

## Photon Setup

* Go to https://dashboard.photonengine.com and create your own account/login to your own account, check email for the account confirmation, create a new app and for **Photon SDK**, choose **Realtime**, copy app id, in your **PIGGY: Hunt** application folder, navigate to **piggy-hunt_Data** and open **resource.assets** in a hex editor (such as HxD). Replace **a34b05a1-c30c-4997-93a5-5d139a87416f** with your app id.

---

## Screenshots

<details>
  <summary>Click to view screenshots</summary>

  <img src="Screenshots/Screenshot1.png" alt="Screenshot 1">
  <img src="Screenshots/Screenshot2.png" alt="Screenshot 2">

</details>

---

## Disclaimer
**Piglet Hunt** uses resources from the APIs of **Beamable/Disruptor Beam** and is not affiliated with **MiniToon**, **Shaggy Doge**, **Beamable/Disruptor Beam**.
All rights to Piggy, Piggy: Intercity, and PIGGY: Hunt belong to their respective owners.

If a takedown is requested by the original developers, this repository will be removed.
