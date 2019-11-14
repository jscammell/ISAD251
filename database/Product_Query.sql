CREATE TABLE Product(
    productId INT IDENTITY(1,1) PRIMARY KEY NOT NULL,
    productName VARCHAR(40) NOT NULL,
    productDetails VARCHAR(40) NOT NULL,
    stockCount INT NOT NULL,
    cost DECIMAL(4,2) NOT NULL,
)