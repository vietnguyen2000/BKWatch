CREATE SCHEMA IF NOT EXISTS BKWATCH;
CREATE TABLE User (
  id int(10) NOT NULL AUTO_INCREMENT,
  username varchar(255) UNIQUE,
  password varchar(255),
  fullname varchar(255),
  address varchar(255),
  email varchar(255) UNIQUE,
  phoneNumber varchar(255),
  gender bit(1) NOT NULL,
  avatarURL varchar(2048),
  role int(10) NOT NULL,
  rememberToken varchar(64),
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
  content LONGTEXT,
  `tag` varchar(255),
  price DECIMAL(14, 2) NOT NULL,
  discount int(11) NOT NULL DEFAULT 0,
  currency varchar(255) DEFAULT "VND",
  warranty int(10) NOT NULL DEFAULT 3,
  isHot bit(1) NOT NULL DEFAULT 1,
  isNew bit(1) NOT NULL DEFAULT 1,
  isBestSale bit(1) NOT NULL DEFAULT 1,
  quantity int(10) NOT NULL DEFAULT 1,
  material varchar(40),
  glass varchar(40),
  back varchar(40),
  shape varchar(40),
  diameter varchar(40),
  height varchar(40),
  lugWidth varchar(40),
  color varchar(40),
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE ProductImage (
  id int(10) NOT NULL AUTO_INCREMENT,
  productId int(10) NOT NULL,
  imageURL varchar(2048) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE ProductCategory (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255),
  level int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE ProductBrand (
  id int(10) NOT NULL AUTO_INCREMENT,
  title varchar(255),
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE ProductComment (
  id int(10) NOT NULL AUTO_INCREMENT,
  content LONGTEXT,
  imageURL varchar(2048),
  rating int(10) NOT NULL,
  productId int(10) NOT NULL,
  userId int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE Blog (
  id int(10) NOT NULL AUTO_INCREMENT,
  userId int(10) NOT NULL,
  title varchar(255),
  content LONGTEXT,
  updateDate date,
  isHot bit(1) NOT NULL,
  countLike int(10) NOT NULL,
  countDislike int(10) NOT NULL,
  countView int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE BlogImage (
  id int(10) NOT NULL AUTO_INCREMENT,
  blogId int(10) NOT NULL,
  imageURL varchar(2048) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE BlogComment (
  id int(10) NOT NULL AUTO_INCREMENT,
  content LONGTEXT,
  imageURL varchar(2048),
  rating int(10) NOT NULL,
  blogId int(10) NOT NULL,
  userId int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
CREATE TABLE `Order` (
  id varchar(255) NOT NULL,
  userId int(10) NOT NULL,
  address varchar(255),
  phone varchar(255),
  invoice bit(1) NOT NULL,
  total int(10) NOT NULL,
  paymentMethod varchar(255),
  currency varchar(255),
  shippingFee int(10) NOT NULL,
  shippingProvider varchar(255),
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
CREATE TABLE CartItem (
  id int(10) NOT NULL AUTO_INCREMENT,
  quantity int(10) NOT NULL DEFAULT 1,
  productId int(10) NOT NULL,
  userId int(10) NOT NULL,
  createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updatedAt DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE = InnoDB;
ALTER TABLE
  Blog
ADD
  CONSTRAINT FKBlog204708 FOREIGN KEY (userId) REFERENCES User (id);
ALTER TABLE
  BlogComment
ADD
  CONSTRAINT FKBlogCommen608056 FOREIGN KEY (blogId) REFERENCES Blog (Id);
ALTER TABLE
  BlogComment
ADD
  CONSTRAINT FKBlogCommen716278 FOREIGN KEY (userId) REFERENCES User (id);
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
  CONSTRAINT FKOrder556775 FOREIGN KEY (userId) REFERENCES User (id);
ALTER TABLE
  ProductComment
ADD
  CONSTRAINT FKProductCom914157 FOREIGN KEY (productId) REFERENCES Product (id);
ALTER TABLE
  ProductComment
ADD
  CONSTRAINT FKProductCom696003 FOREIGN KEY (userId) REFERENCES User (id);
ALTER TABLE
  OrderDetail
ADD
  CONSTRAINT FKOrderDetai559638 FOREIGN KEY (productId) REFERENCES Product (id);
ALTER TABLE
  OrderDetail
ADD
  CONSTRAINT FKOrderDetai762072 FOREIGN KEY (orderId) REFERENCES `Order` (id);
ALTER TABLE
  CartItem
ADD
  CONSTRAINT FKProductLin650908 FOREIGN KEY (productId) REFERENCES Product (id);
ALTER TABLE
  CartItem
ADD
  CONSTRAINT FKProductLin630176 FOREIGN KEY (userId) REFERENCES User (id);
ALTER TABLE
  ProductImage
ADD
  CONSTRAINT FKProductImage FOREIGN KEY (productId) REFERENCES Product (id);
ALTER TABLE
  BlogImage
ADD
  CONSTRAINT FKBlogImage FOREIGN KEY (blogId) REFERENCES Blog (id);
CREATE VIEW UserPreview AS
SELECT
  id,
  username,
  fullname,
  address,
  email,
  phoneNumber,
  gender,
  avatarURL,
  role
FROM
  user;
CREATE VIEW ProductPreview AS
SELECT
  p.*,
  pc.title as categoryTitle,
  pb.title as brandTitle,
  GROUP_CONCAT(pi.imageURL SEPARATOR '||') as imageURL
FROM
  product as p
  LEFT JOIN productimage as pi on p.id = pi.productId
  LEFT JOIN productcategory as pc on p.productCategoryId = pc.id
  LEFT JOIN productbrand as pb on p.productBrandId = pb.id
GROUP BY
  p.id;
CREATE VIEW productCommentView AS
SELECT
  pc.*,
  up.fullname,
  up.address,
  up.email,
  up.phoneNumber,
  up.gender,
  up.avatarURL
FROM
  productComment as pc
  LEFT JOIN userPreview as up ON pc.userId = up.id;