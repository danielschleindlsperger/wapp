DROP DATABASE IF EXISTS Alderaan;

CREATE DATABASE Alderaan;

USE Alderaan;

/*
CREATE TABLE contacts (
  id INT (12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR (100) NOT NULL,
  email VARCHAR (250) NOT NULL,
  phone VARCHAR (50) NOT NULL,
  fax VARCHAR (50) NOT NULL
) ENGINE=InnoDB;
*/

CREATE TABLE clients (
  id INT (12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  client_name VARCHAR (100) NOT NULL,
  street VARCHAR (250) NOT NULL,
  street_number VARCHAR (25) NOT NULL,
  area_code VARCHAR (15) NOT NULL,
  city VARCHAR (250) NOT NULL,
  country VARCHAR (100) NOT NULL,
  contact_first_name VARCHAR (100) NOT NULL,
  contact_last_name VARCHAR (100) NOT NULL,
  contact_email VARCHAR (100) NOT NULL,
  contact_phone VARCHAR (50) NOT NULL,
  contact_fax VARCHAR (50) NOT NULL
  /* contact_id INT (12) UNSIGNED NOT NULL */
) ENGINE=InnoDB;

CREATE TABLE projects(
  id INT (12) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  client_id INT (12) UNSIGNED NOT NULL,
  project_name VARCHAR (250) NOT NULL,
  status VARCHAR (50) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  contract_amount DECIMAL (13, 2) NOT NULL,
  internal_cost DECIMAL (13, 2) NOT NULL,
  contact_first_name VARCHAR (100) NOT NULL,
  contact_last_name VARCHAR (100) NOT NULL,
  contact_email VARCHAR (100) NOT NULL,
  contact_phone VARCHAR (50) NOT NULL,
  contact_fax VARCHAR (50) NOT NULL
) ENGINE=InnoDB;

/*
ALTER TABLE projects
ADD CONSTRAINT fk_projects_clients
FOREIGN KEY (client_id)
REFERENCES clients(id)
ON UPDATE CASCADE
ON DELETE CASCADE;

ALTER TABLE clients
ADD CONSTRAINT fk_clients_contacts
FOREIGN KEY (contact_id)
REFERENCES contacts(id)
ON UPDATE CASCADE
ON DELETE CASCADE;
*/
