#!/bin/bash

lastTag=$(git tag | tail -n 1)
customTag=$1

if [ "$customTag" != "" ]; then lastTag=$customTag; fi
if [ "$lastTag" = "" ]; then lastTag="master"; fi

rm -f MawMediaSftp-${lastTag}.zip
rm -rf MawMediaSftp
mkdir -p MawMediaSftp
git archive $lastTag | tar -x -C MawMediaSftp

cd MawMediaSftp
composer install --no-dev -n -o
cd ../
zip -r MawMediaSftp-${lastTag}.zip MawMediaSftp
rm -r MawMediaSftp
