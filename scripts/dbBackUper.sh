#!/bin/bash
date=$(date +"%d-%b-%Y-%H:%M")

mysqldump  --lock-tables=false -hapi.digitalprivateeye.com -uwebsite -pmosadoluwa digitalprivateeye > /home/mosa/SERVER/digitalprivateeye.com/scripts/SQLDUMPS/digitalprivateeye-$date.sql
echo "dumped digital private eye database as of $date"

