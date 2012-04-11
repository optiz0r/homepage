#!/bin/bash

TMPFILE="/tmp/cv.pdf"
OUTFILE="public/files/BenRobertsCv.pdf"

# If not specified, the input will be taken from the live website
URL="https://www.benroberts.net/cv/"
if [ "x$1" != "x" ]; then
    URL=$1
fi

# This script has a few dependencies
WKHTMLTOPDF=`which wkhtmltopdf 2>/dev/null`
if [ $? -ne 0 ]; then
    echo "This script requires wkhtmltopdf, which does not appear to be installed."
    exit 1
fi
PDFTK=`which pdftk 2>/dev/null`
if [ $? -ne 0 ]; then
    echo "This script requires pdftk, which does not appear to be installed."
    exit 1
fi

# This script should be run from the homepage root directory, not from the build directory.
if [ ! -d `dirname $OUTFILE` ]; then
    echo "output directory public/files does not exist"
    exit 1
fi

echo "Updating CV from $URL to $OUTFILE"

# Use wkhtmltopdf to print the CV page. CSS styles hide the UI components not intended for print
$WKHTMLTOPDF --no-background $URL $TMPFILE

# Correct display bug in wkhtmltopdf output - retrieve only the first two pages.
# CV must be kept shorter than 2 pages long.
$PDFTK $TMPFILE cat 1-2 output $OUTFILE

# Remove temporary file
rm $TMPFILE
