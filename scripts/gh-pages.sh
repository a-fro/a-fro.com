#!/usr/bin/env bash

set -e

mv web/sites/default/settings.local.php web/sites/default/settings.local-bk.php
drush cr
drush tome:static -y -l https://a-fro.github.io/a-fro.com
rm -rf gh-pages
git clone git@github.com:a-fro/a-fro.com.git gh-pages
cd gh-pages
git checkout main || git checkout -b main
cd ..
rm -rf gh-pages/*
cp -r html/a-fro.com/* gh-pages/
cd gh-pages
git add .
git commit -m 'Updating gh-pages site'
git push -u origin main
cd ..
mv web/sites/default/settings.local-bk.php web/sites/default/settings.local.php
drush cr
