CREATE SCHEMA IF NOT EXISTS BKWATCH;
CREATE TABLE Admin (
  id int(10) NOT NULL AUTO_INCREMENT,
  username varchar(100),
  password varchar(100),
  fullname varchar(255),
  address varchar(255),
  email varchar(255),
  phoneNumber varchar(255),
  gender bit(1) NOT NULL,
  avatarURL varchar(255),
  role int(10) NOT NULL,
  published int(1) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE Customer (
  id int(10) NOT NULL AUTO_INCREMENT,
  username varchar(255),
  password varchar(255),
  fullname varchar(255),
  address varchar(255),
  email varchar(255),
  phoneNumber varchar(255),
  gender bit(1) NOT NULL,
  avatarURL varchar(255),
  role int(10) NOT NULL,
  published int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (Id)
) ENGINE = InnoDB;
CREATE TABLE Product (
  id int(10) NOT NULL AUTO_INCREMENT,
  productBrandId int(10) NOT NULL,
  productCategoryId int(10) NOT NULL,
  productCode varchar(255),
  title varchar(255),
  content varchar(255),
  imageURL varchar(255),
  `tag` varchar(255),
  price int(11) NOT NULL,
  discount int(11) NOT NULL,
  currency varchar(255),
  warranty int(10) NOT NULL,
  published int(10) NOT NULL,
  isHot bit(1) NOT NULL,
  isNew bit(1) NOT NULL,
  isBestSale bit(1) NOT NULL,
  rating float NOT NULL,
  countSale int(10) NOT NULL,
  quantity int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE ProductCategory (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255),
  published int(10) NOT NULL,
  level int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE ProductBrand (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255),
  published int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE ProductComment (
  id int(10) NOT NULL AUTO_INCREMENT,
  content varchar(255),
  omageURL varchar(255),
  published int(10) NOT NULL,
  rating int(10) NOT NULL,
  productId int(10) NOT NULL,
  customerId int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE Blog (
  id int(10) NOT NULL AUTO_INCREMENT,
  adminId int(10) NOT NULL,
  title varchar(255),
  shortContent varchar(255),
  content varchar(1000),
  imageURL varchar(255),
  updateDate date,
  published int(1) NOT NULL,
  isHot bit(1) NOT NULL,
  countLike int(10) NOT NULL,
  countDislike int(10) NOT NULL,
  countView int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE BlogComment (
  id int(10) NOT NULL AUTO_INCREMENT,
  content varchar(1000),
  imageURL varchar(255),
  published int(1) NOT NULL,
  rating int(10) NOT NULL,
  blogId int(10) NOT NULL,
  customerId int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE `Order` (
  id varchar(255) NOT NULL,
  customerId int(10) NOT NULL,
  address varchar(255),
  phone varchar(255),
  invoice bit(1) NOT NULL,
  total int(10) NOT NULL,
  paymentMethod varchar(255),
  currency varchar(255),
  shippingFee int(10) NOT NULL,
  shippingProvider varchar(255),
  published int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE Cart (
  id int(10) NOT NULL AUTO_INCREMENT,
  customerId int(10) NOT NULL,
  currency varchar(255),
  published int(10) NOT NULL,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE OrderDetail (
  id int(10) NOT NULL AUTO_INCREMENT,
  quantity int(10) NOT NULL,
  productId int(10) NOT NULL,
  orderId varchar(255) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE ProductLine (
  id int(10) NOT NULL AUTO_INCREMENT,
  quantity int(10) NOT NULL,
  addedDate date,
  productId int(10) NOT NULL,
  cartId int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
ALTER TABLE
  Blog
ADD
  CONSTRAINT FKBlog204708 FOREIGN KEY (adminId) REFERENCES Admin (id);
ALTER TABLE
  BlogComment
ADD
  CONSTRAINT FKBlogCommen608056 FOREIGN KEY (blogId) REFERENCES Blog (Id);
ALTER TABLE
  BlogComment
ADD
  CONSTRAINT FKBlogCommen716278 FOREIGN KEY (customerId) REFERENCES Customer (id);
ALTER TABLE
  Product
ADD
  CONSTRAINT FKProduct950488 FOREIGN KEY (productCategoryId) REFERENCES ProductCategory (id);
ALTER TABLE
  Product
ADD
  CONSTRAINT FKProduct138202 FOREIGN KEY (productBrandId) REFERENCES ProductBrand (id);
ALTER TABLE
  `Order`
ADD
  CONSTRAINT FKOrder556775 FOREIGN KEY (customerId) REFERENCES Customer (id);
ALTER TABLE
  ProductComment
ADD
  CONSTRAINT FKProductCom914157 FOREIGN KEY (productId) REFERENCES Product (id);
ALTER TABLE
  ProductComment
ADD
  CONSTRAINT FKProductCom696003 FOREIGN KEY (customerId) REFERENCES Customer (id);
ALTER TABLE
  OrderDetail
ADD
  CONSTRAINT FKOrderDetai559638 FOREIGN KEY (productId) REFERENCES Product (id);
ALTER TABLE
  OrderDetail
ADD
  CONSTRAINT FKOrderDetai762072 FOREIGN KEY (orderId) REFERENCES `Order` (id);
ALTER TABLE
  ProductLine
ADD
  CONSTRAINT FKProductLin650908 FOREIGN KEY (productId) REFERENCES Product (id);
ALTER TABLE
  ProductLine
ADD
  CONSTRAINT FKProductLin630176 FOREIGN KEY (cartId) REFERENCES Cart (id);
ALTER TABLE
  Cart
ADD
  CONSTRAINT FKCart195887 FOREIGN KEY (customerId) REFERENCES Customer (id);