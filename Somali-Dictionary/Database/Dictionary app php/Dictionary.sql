
Create database qaamuus;

use qaamuus;

CREATE TABLE dictionary (
  `Word` VARCHAR(100) NOT NULL,
  `Meaning` VARCHAR(300) NOT NULL,
  PRIMARY KEY (`Word`));