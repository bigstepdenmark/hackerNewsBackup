#!/bin/bash

# Trigger deployment
# Replace the url below with your Forge/Laravel url
curl -s 'https://forge.laravel.com/servers/111111/sites/2222222/deploy/http?token=TOKEN';
echo 'Deployment triggered!'