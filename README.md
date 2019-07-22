# Raspberry-internet-speed-meter
Check your internet speed every 15min and store it in a csv file

<br>

## Raspberry Pi installation
### Installation of Raspbian
Download the NOOBS OS : https://downloads.raspberrypi.org/NOOBS_latest

Extract the archive.

Copy past the files on your SD cart.

Insert the SD cart in your Raspberry Pi and start it.

Follow the installations steps.

### Installation of PHP 7
<code>nano /etc/apt/sources.list</code> 

Uncomment the line : 
<code>deb-src http://raspbian.raspberrypi.org/raspbian/ stretch main contrib non-free rpi</code> 

<code>apt-get update</code> 

<code>apt-get install -t stretch php7.0 php7.0-curl php7.0-gd php7.0-fpm php7.0-cli php7.0-opcache php7.0-mbstring php7.0-xml php7.0-zip</code> 

Test by typing <code>php -v</code> in your terminal. You should have something like :

```
PHP 7.0.4-7 (cli) ( NTS )  
Copyright (c) 1997-2016 The PHP Group  
Zend Engine v3.0.0, Copyright (c) 1998-2016 Zend Technologies  
with Zend OPcache v7.0.6-dev, Copyright (c) 1999-2016, by Zend Technologies
```

### Installation of Curl
Type in Raspberry terminal :

```
sudo apt-get install curl
```


### Wi-Fi autoconnecting
Type in your terminal :
<code>sudo nano /etc/wpa_supplicant/wpa_supplicant.conf</code>
 
 And append some thing like :
 
```
network={  
    ssid="Livebox-12345"  
    psk="123456789AZERTY"  
}
```

Now when you will restart your Raspberry, it will automatically connects to this network. 

<br> 
    
## Project installation
### Copying of the project files on your Raspberry pi
Copy all this project files to your Raspberry in `/home/pi/Raspberry-internet-speed-meter/`.

Then Chmod the file `/home/pi/Raspberry-water-the-garden/lastwaterings.txt` to 777.

### Customization
Customize the constants in the `config.php` file.

### Set the cron tab
On your Raspberry, in terminal, type `crontab -e` and add that line:
```
*/15 * * * * sudo php /home/pi/Raspberry-water-the-garden/waterthegarden.php 2>&1
```


<br>

## Enjoy!
Your Raspberry pi will check your internet speed every 15min and store the value in a csv file.
