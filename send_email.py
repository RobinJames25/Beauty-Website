import smtplib
import sys
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

# Check if enough arguments are provided
if len(sys.argv) < 3:
    print("Usage: python3 send_email.py recipient_email recipient_name")
    sys.exit(1)

recipient_email = sys.argv[1]
recipient_name = sys.argv[2]

# SMTP Configuration
SMTP_SERVER = "smtp.gmail.com"
SMTP_PORT = 587
SENDER_EMAIL = "jamesrobin12432@gmail.com"  
SENDER_PASSWORD = "tghdrzgjcohyiupk"  

# Create email message
subject = "Email Verification"
verification_link = f"http://localhost/Beauty-Garden/verify-email.php?mail={recipient_email}"

body = f"""
<h2>Hello {recipient_name},</h2>
<p>Thank you for signing up for Beauty Garden.</p>
<p>Please verify your email by clicking the link below:</p>
<a href="{verification_link}">Verify Email</a>
<p>If you did not sign up, please ignore this email.</p>
"""

msg = MIMEMultipart()
msg["From"] = SENDER_EMAIL
msg["To"] = recipient_email
msg["Subject"] = subject
msg.attach(MIMEText(body, "html"))

try:
    # Connect to SMTP server
    server = smtplib.SMTP(SMTP_SERVER, SMTP_PORT)
    server.starttls()  # Secure the connection
    server.login(SENDER_EMAIL, SENDER_PASSWORD)
    
    # Send email
    server.sendmail(SENDER_EMAIL, recipient_email, msg.as_string())
    server.quit()
    
    print("Success")  # ✅ This makes sure PHP detects successful email sending
except Exception as e:
    print(f"Error: {e}")
