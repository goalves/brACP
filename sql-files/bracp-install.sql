-- ----------------------------------------------------------------------------- --
-- Tabelas de instalação para ambiente pag-seguro e log de informações
-- para o painel de controle.
-- ----------------------------------------------------------------------------- --

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `bracp_donations_promo`;
CREATE TABLE IF NOT EXISTS `bracp_donations_promo` (
    `PromotionID` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `PromotionDescription` VARCHAR(1024) NOT NULL DEFAULT '',
    `BonusMultiply` INTEGER NOT NULL DEFAULT 0,
    `PromotionStartDate` DATE NOT NULL DEFAULT '0000-00-00',
    `PromotionEndDate` DATE NOT NULL DEFAULT '0000-00-00',
    `PromotionCanceled` BOOLEAN NOT NULL DEFAULT FALSE,
    INDEX (`PromotionStartDate`, `PromotionEndDate`)
) ENGINE=InnoDB COLLATE='utf8_swedish_ci';

DROP TABLE IF EXISTS `bracp_donations`;
CREATE TABLE IF NOT EXISTS `bracp_donations` (
    `DonationID` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `PromotionID` INTEGER NULL DEFAULT NULL,
    `DonationDate` DATE NOT NULL DEFAULT '0000-00-00',
    `DonationRefer` CHAR(32) NOT NULL,
    `DonationDrive` ENUM('PAYPAL') NOT NULL DEFAULT 'PAYPAL',
    `AccountID` INTEGER NOT NULL,
    `DonationValue` DECIMAL(12, 2) NOT NULL DEFAULT 0.00,
    `DonationBonus` INTEGER NOT NULL DEFAULT 0,
    `DonationTotalValue` DECIMAL(12, 2) NOT NULL DEFAULT 0.00,
    `CheckoutCode` VARCHAR(50) NULL DEFAULT NULL,
    `TransactionCode` VARCHAR(50) NULL DEFAULT NULL,
    `DonationReceiveBonus` BOOLEAN NOT NULL DEFAULT TRUE,
    `DonationCompensate` BOOLEAN NOT NULL DEFAULT FALSE,
    `DonationStatus` ENUM('STARTED', 'PAYD', 'CANCELED', 'ROLLBACK') NOT NULL DEFAULT 'STARTED',
    `DonationPaymentDate` DATETIME NULL DEFAULT NULL,
    `DonationCancelDate` DATETIME NULL DEFAULT NULL,

    FOREIGN KEY (`PromotionID`) REFERENCES `bracp_donations_promo` (`PromotionID`),
    UNIQUE INDEX (`DonationRefer`, `TransactionCode`)
) ENGINE=InnoDB COLLATE='utf8_swedish_ci';

DROP TABLE IF EXISTS `bracp_compensations`;
CREATE TABLE IF NOT EXISTS `bracp_compensations` (
    `CompensateID` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `DonationID` INTEGER NOT NULL,
    `CompensatePending` BOOLEAN NOT NULL DEFAULT TRUE,
    `CompensateDate` DATETIME NULL DEFAULT NULL,

    FOREIGN KEY (`DonationID`) REFERENCES `bracp_donations` (`DonationID`)
) ENGINE=InnoDB COLLATE='utf8_swedish_ci';

DROP TABLE IF EXISTS `bracp_recover`;
CREATE TABLE IF NOT EXISTS `bracp_recover` (
    `RecoverID` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `AccountID` INTEGER NOT NULL,
    `RecoverCode` VARCHAR(32) NOT NULL,
    `RecoverDate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    `RecoverExpire` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    `RecoverUsed` BOOLEAN NOT NULL DEFAULT FALSE,
    UNIQUE INDEX (`RecoverCode`),
    INDEX (`AccountID`)
) ENGINE=InnoDB COLLATE='utf8_swedish_ci';

DROP TABLE IF EXISTS `bracp_change_mail_log`;
CREATE TABLE IF NOT EXISTS `bracp_change_mail_log` (
    `EmailLogID` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `AccountID` INTEGER NOT NULL,
    `EmailFrom` VARCHAR(39) NOT NULL,
    `EmailTo` VARCHAR(39) NOT NULL,
    `EmailLogDate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
    INDEX (`AccountID`)
) ENGINE=InnoDB COLLATE='utf8_swedish_ci';

DROP TABLE IF EXISTS `bracp_themes`;
CREATE TABLE IF NOT EXISTS `bracp_themes` (
    `ThemeID` INTEGER NOT NULL PRIMARY KEY,
    `Name` VARCHAR(20) NOT NULL DEFAULT '',
    `Version` VARCHAR(10) NOT NULL DEFAULT '',
    `Folder` VARCHAR(100) NOT NULL DEFAULT '',
    `ImportTime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00', 
    UNIQUE INDEX (`Folder`)
) ENGINE=MyISAM COLLATE='utf8_swedish_ci';

DROP TABLE IF EXISTS `bracp_account_confirm`;
CREATE TABLE IF NOT EXISTS `bracp_account_confirm` (
    `ConfirmationID` INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `AccountID` INTEGER NOT NULL,
    `ConfirmationCode` VARCHAR(32) NOT NULL,
    `ConfirmationDate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    `ConfirmationExpire` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
    `ConfirmationUsed` BOOLEAN NOT NULL DEFAULT FALSE,
    UNIQUE INDEX (`ConfirmationCode`),
    INDEX (`AccountID`)
) ENGINE=MyISAM COLLATE='utf8_swedish_ci';

SET FOREIGN_KEY_CHECKS = 1;
