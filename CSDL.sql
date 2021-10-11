CREATE SCHEMA IF NOT EXISTS BKWATCH;
CREATE TABLE Admin (
	Id int(10) NOT NULL AUTO_INCREMENT,
    Username varchar(100),
    Password varchar(100),
    Fullname varchar(255),
    Address varchar(255),
    Email varchar(255),
    PhoneNumber varchar(255),
    Gender bit(1) NOT NULL,
    AvatarURL varchar(255),
    Role int(10) NOT NULL,
    CreatedDate date,
    Published int(1) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE Customer (
	Id int(10) NOT NULL AUTO_INCREMENT,
    Username varchar(255),
    Password varchar(255),
    Fullname varchar(255),
    Address varchar(255),
    Email varchar(255),
    PhoneNumber varchar(255),
    Gender bit(1) NOT NULL,
    AvatarURL varchar(255),
    Role int(10) NOT NULL,
    CreatedDate date,
    Published int(10) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;
CREATE TABLE Product (
	Id int(10) NOT NULL AUTO_INCREMENT,
    ProductBrandId int(10) NOT NULL,
	ProductCategoryId int(10) NOT NULL,
    ProductCode varchar(255),
    Title varchar(255),
    Content varchar(255),
    ImageURL varchar(255),
    `Tag` varchar(255),
    Price int(11) NOT NULL,
    Discount int(11) NOT NULL,
    Currency varchar(255),
    Warranty int(10) NOT NULL,
    CreatedDate date,
    Published int(10) NOT NULL,
    IsHot bit(1) NOT NULL,
    IsNew bit(1) NOT NULL,
    IsBestSale bit(1) NOT NULL,
    Rating float NOT NULL,
    CountSale int(10) NOT NULL,
    Quantity int(10) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE ProductCategory (
	Id int(10) NOT NULL AUTO_INCREMENT,
    Title varchar(255),
    Published int(10) NOT NULL,
    Level int(10) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE ProductBrand (
	Id int(10) NOT NULL AUTO_INCREMENT,
    Title varchar(255),
    Published int(10) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE ProductComment (
Id int(10) NOT NULL AUTO_INCREMENT,
 Content varchar(255),
 ImageURL varchar(255),
 CreatedDate date,
 Published int(10) NOT NULL,
 Rating int(10) NOT NULL,
 ProductId int(10) NOT NULL,
 CustomerId int(10) NOT NULL,
 PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE Blog (
	Id int(10) NOT NULL AUTO_INCREMENT,
    AdminId int(10) NOT NULL,
    Title varchar(255),
    ShortContent varchar(255),
    Content varchar(1000),
    ImageURL varchar(255),
    CreatedDate date,
    UpdateDate date,
    Published int(1) NOT NULL,
    IsHot bit(1) NOT NULL,
    CountLike int(10) NOT NULL,
    CountDislike int(10) NOT NULL,
    CountView int(10) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE BlogComment (
	Id int(10) NOT NULL AUTO_INCREMENT,
    Content varchar(1000),
    ImageURL varchar(255),
    CreatedDate date,
    Published int(1) NOT NULL,
    Rating int(10) NOT NULL,
    BlogId int(10) NOT NULL,
    CustomerId int(10) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE `Order` (
	Id varchar(255) NOT NULL,
    CustomerId int(10) NOT NULL,
    Address varchar(255),
    Phone varchar(255),
    Invoice bit(1) NOT NULL,
    Total int(10) NOT NULL,
    PaymentMethod varchar(255),
    Currency varchar(255),
    ShippingFee int(10) NOT NULL,
    ShippingProvider varchar(255),
    CreatedDate date,
    Published int(10) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE Cart (
	Id int(10) NOT NULL AUTO_INCREMENT,
    CustomerId int(10) NOT NULL,
    Currency varchar(255),
    Published int(10) NOT NULL,
    PRIMARY KEY (Id)
) ENGINE=InnoDB;

CREATE TABLE OrderDetail (
	ID int(10) NOT NULL AUTO_INCREMENT,
    Quantity int(10) NOT NULL,
    CreatedDate int(10),
    ProductId int(10) NOT NULL,
    OrderId varchar(255) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE=InnoDB;

CREATE TABLE ProductLine (
	ID int(10) NOT NULL AUTO_INCREMENT,
    Quantity int(10) NOT NULL,
    AddedDate date,
    ProductId int(10) NOT NULL,
    CartId int(10) NOT NULL,
    PRIMARY KEY (ID)
) ENGINE=InnoDB;

ALTER TABLE Blog ADD CONSTRAINT FKBlog204708 FOREIGN KEY (AdminId) REFERENCES Admin (Id);

ALTER TABLE BlogComment ADD CONSTRAINT FKBlogCommen608056 FOREIGN KEY (BlogId) REFERENCES Blog (Id);

ALTER TABLE BlogComment ADD CONSTRAINT FKBlogCommen716278 FOREIGN KEY (CustomerId) REFERENCES Customer (Id);

ALTER TABLE Product ADD CONSTRAINT FKProduct950488 FOREIGN KEY (ProductCategoryId) REFERENCES ProductCategory (Id);

ALTER TABLE Product ADD CONSTRAINT FKProduct138202 FOREIGN KEY (ProductBrandId) REFERENCES ProductBrand (Id);

ALTER TABLE `Order` ADD CONSTRAINT FKOrder556775 FOREIGN KEY (CustomerId) REFERENCES Customer (Id);

ALTER TABLE ProductComment ADD CONSTRAINT FKProductCom914157 FOREIGN KEY (ProductId) REFERENCES Product (Id);

ALTER TABLE ProductComment ADD CONSTRAINT FKProductCom696003 FOREIGN KEY (CustomerId) REFERENCES Customer (Id);

ALTER TABLE OrderDetail ADD CONSTRAINT FKOrderDetai559638 FOREIGN KEY (ProductId) REFERENCES Product (Id);

ALTER TABLE OrderDetail ADD CONSTRAINT FKOrderDetai762072 FOREIGN KEY (OrderId) REFERENCES `Order` (Id);

ALTER TABLE ProductLine ADD CONSTRAINT FKProductLin650908 FOREIGN KEY (ProductId) REFERENCES Product (Id);

ALTER TABLE ProductLine ADD CONSTRAINT FKProductLin630176 FOREIGN KEY (CartId) REFERENCES Cart (Id);

ALTER TABLE Cart ADD CONSTRAINT FKCart195887 FOREIGN KEY (CustomerId) REFERENCES Customer (Id);
