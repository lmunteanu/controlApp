###############
;RUN GOOD ONES
################

CREATE TABLE IF NOT EXISTS `chkUser` (
    `UserID` int(11)  NOT NULL AUTO_INCREMENT,
    `TypeID` int(11)  NOT NULL ,
    `Name` varchar(50)  NOT NULL ,
    `Date_Start` datetime  NULL ,
    `Description` text NOT NULL ,
    `Address` varchar(100) NOT  NULL ,
    CONSTRAINT `pk_chkUser` PRIMARY KEY (
        `UserID`
    )
)

CREATE TABLE IF NOT EXISTS `chkUserType` (
    `TypeID` int(11)  NOT NULL AUTO_INCREMENT,
    `Description` text NOT NULL ,
    CONSTRAINT `pk_chkUserType` PRIMARY KEY (
        `TypeID`
    )
)

CREATE TABLE IF NOT EXISTS `chkCheck` (
    `CheckID` int(11)  NOT NULL AUTO_INCREMENT,
    `UserID` int(11)  NOT NULL ,
    `CheckDate` datetime  NULL ,
    `Description` text NOT NULL ,
    CONSTRAINT `pk_chkCheck` PRIMARY KEY (
        `CheckID`
    )
)

ALTER TABLE `chkUser` ADD CONSTRAINT `fk_chkUser_TypeID` FOREIGN KEY(`TypeID`)
REFERENCES `chkUserType` (`TypeID`)

ALTER TABLE `chkCheck` ADD CONSTRAINT `fk_chkCheck_UserID` FOREIGN KEY(`UserID`)
REFERENCES `chkUser` (`UserID`)