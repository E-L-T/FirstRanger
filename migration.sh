#!/bin/bash
MIGRATIONFILE=`vendor/bin/propel diff | grep 'file successfully created' | sed -re 's/"(.*?)" file.*/\1/'`
sed -i -r 's/getDownSQL/getTotoSQL/' $MIGRATIONFILE
sed -i -r 's/getUpSQL/getDownSQL/' $MIGRATIONFILE
sed -i -r 's/getTotoSQL/getUpSQL/' $MIGRATIONFILE
vendor/bin/propel reverse
mv generated-reversed-database/schema.xml schema.xml
rm -r generated-reversed-database
vendor/bin/propel model:build src/
