CREATE TABLE OrderId(
orderId INT IDENTITY(1,1) NOT NULL PRIMARY KEY,
accountId INT NOT NULL FOREIGN KEY REFERENCES Account(accountId),
);