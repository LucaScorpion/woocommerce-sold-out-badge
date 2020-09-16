#!/usr/bin/env bash
set -eu

# Clean up any previous build artifacts.
[ -f woocommerce-sold-out-badge.zip ] && rm woocommerce-sold-out-badge.zip
[ -d woocommerce-sold-out-badge ] && rm -r woocommerce-sold-out-badge

# Copy the files into a directory and zip it.
mkdir woocommerce-sold-out-badge
cp ./*.{php,css,md} woocommerce-sold-out-badge
cp -r languages woocommerce-sold-out-badge
zip -r woocommerce-sold-out-badge.zip woocommerce-sold-out-badge
rm -r woocommerce-sold-out-badge
