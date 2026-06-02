CREATE TABLE plans (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  max_units INT DEFAULT 10,
  max_users INT DEFAULT 20,
  features JSON,
  price DECIMAL(8,2) DEFAULT 0.00
);

CREATE TABLE condominium (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  CNPJ VARCHAR(18),
  address TEXT,
  units INT DEFAULT 0,
  plan_id INT, admin_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (plan_id) REFERENCES plans(id)
);

CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  cpf varchar(14) NOT NULL,
  email VARCHAR(150) UNIQUE NOT NULL,
  password_hash VARCHAR(255) NOT NULL,
  role ENUM('admin','sindico','morador') DEFAULT 'morador',
  condo_id INT, plan_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (condo_id) REFERENCES condominium(id),
  FOREIGN KEY (plan_id) REFERENCES plans(id)
);