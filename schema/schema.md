Database Schema
===================

# User

- username VARCHAR(32)
- email VARCHAR(32)
- first_name VARCHAR(16)
- last_name VARCHAR(16
- car_id INTEGER
- is_admin BOOLEAN


# Offer

- offer_id INTEGER
- owner_username VARCHAR(32)
- start_location VARCHAR(64)
- end_location VARCHAR(64)
- seats INTEGER
- fee FLOAT(2)

# Request

- request_id INTEGER
- username VARCHAR(32)
- seats_requested INTEGER
- offer_id INTEGER
