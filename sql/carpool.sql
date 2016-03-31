CREATE TABLE Users (
  username VARCHAR(32) PRIMARY KEY,
  email VARCHAR(32) NOT NULL,
  first_name VARCHAR(16) NOT NULL,
  last_name VARCHAR(16) NOT NULL,
  car_id INTEGER,
  is_admin BOOLEAN
);

CREATE TABLE Cars (
  license_plate VARCHAR(16) PRIMARY KEY
);

CREATE TABLE Offers (
  offer_id INTEGER PRIMARY KEY,
  owner_username VARCHAR(32) REFERENCES Users(username),
  start_location VARCHAR(64),
  end_location VARCHAR(64),
  seats INTEGER,
  fee FLOAT(2)
);

CREATE TABLE Requests (
  request_id INTEGER PRIMARY KEY,
  username VARCHAR(32) REFERENCES Users(username),
  seats_requested INTEGER,
  offer_id INTEGER REFERENCES Offers(offer_id)
);

CREATE TABLE Transactions (
  transaction_id INTEGER PRIMARY KEY,
  offer_id INTEGER REFERENCES Offers(offer_id),
  request_id INTEGER REFERENCES Requests(request_id),
  username VARCHAR(32) REFERENCES Users(username),
  transaction_fee FLOAT(2)
);
