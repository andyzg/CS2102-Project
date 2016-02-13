Database Schema
===================

# User

- id 
- username PRIMARY KEY
- email UNIQUE NOT NULL
- first_name VARCHAR(32)
- last_name VARCHAR(32)
- car_id FOREIGN KEY Car
- is_admin BIT


# Car

- id
- license_plate PRIMARY KEY

# Offer

- id
- owner_id FOREIGN KEY user
- start VARCHAR(64)
- destination VARCHAR(64)
- seats
- fee

# Request

- id
- user_id FOREIGN KEY user
- seats_requested
- offer_id FOREIGN KEY Offer
- transaction_id FOREIGN

# Transaction

- id
- offer_id
- request_id
- user_id
- transaction_fee
