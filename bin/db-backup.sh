#!/bin/bash

# バックアップ先ディレクトリ
BACKDIR=/home/backup/mysql

# バックアップ先ディレクトリ再作成
mkdir -p $BACKDIR

# 曜日を取得
WEEKDAY=`date +'%w'`

# データベースごとにバックアップ
mysqldump -u karuser -pkarpass karphp | gzip > $BACKDIR/karphp.sql.$WEEKDAY.gz
