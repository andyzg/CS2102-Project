UPDATE Offers
SET a.username = b.username, a.offer_id = b.offer_id
FROM Offers a, Users b
WHERE a.id = b.id;

UPDATE Requests
SET a.username = b.username, a.offer_id = b.offer_id
FROM Requests a, Offers b
WHERE a.id = 101-b.id;

UPDATE Transactions
SET a.username = b.username, a.request_id = b.request_id, a.offer_id = b.offer_id
FROM Transactions a, Requests b
WHERE a.id = b.id;