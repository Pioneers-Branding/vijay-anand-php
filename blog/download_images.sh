@echo off
REM Image Download Script for Blog Posts
REM Usage: Run this script to download images from external URLs
REM Requirements: wget or curl installed

echo Creating folders and downloading images...

cd /d "%~dp0"

REM Create images directory if not exists
if not exist "assets\images" mkdir "assets\images"

REM Download images using curl (Windows 10+ has curl built-in)
REM For each post, download its images

REM Example usage:
REM curl -L -o "assets\images\3004-breast-cancer-patient-guide\image-1.jpg" "https://34.93.124.130/wp-content/uploads/2022/11/breast_cancer-300x228-1.jpg"

echo.
echo ========================================
echo Image Download Helper Script Created
echo ========================================
echo.
echo To download images manually:
echo 1. Use curl: curl -L -o "output.jpg" "URL"
echo 2. Or use wget: wget -O "output.jpg" "URL"
echo.
echo The blog will work with external URLs if images cannot be downloaded locally.
echo.

pause