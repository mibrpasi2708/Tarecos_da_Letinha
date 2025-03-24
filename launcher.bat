@echo off
REM Change to the directory where PHP is located
cd C:\Users\silvami1\php\php-8.4.5-nts-Win32-vs17-x64

REM Start the PHP built-in server
start php -S localhost:8008 -t C:\Users\silvami1\Documents\TarecosDaLetinha

echo PHP built-in server is running at http://localhost:8008
echo Press Ctrl+C to stop the server.
pause
