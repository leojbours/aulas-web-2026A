CREATE TABLE IF NOT EXISTS instruments (
    id SERIAL NOT NULL,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10,2) NOT NULL,
    CONSTRAINT PK_instruments PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS transactions (
    id SERIAL NOT NULL,
    buyer_name VARCHAR(255),
    occurred_at TIMESTAMP NOT NULL DEFAULT NOW(),
    total_value DECIMAL(10,2) NOT NULL,
    CONSTRAINT PK_transactions PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS purchases (
    id SERIAL NOT NULL,
    instrument_id INTEGER NOT NULL,
    transaction_id INTEGER NOT NULL,
    CONSTRAINT PK_purchases PRIMARY KEY (id),
    CONSTRAINT FK_purchases_instrument FOREIGN KEY (instrument_id) REFERENCES instruments(id),
    CONSTRAINT FK_purchases_transaction FOREIGN KEY (transaction_id) REFERENCES transactions(id)
);

CREATE TABLE IF NOT EXISTS person (
    id SERIAL,
    name VARCHAR(255) NOT NULL,
    address_road VARCHAR(255) NOT NULL,
    address_number VARCHAR(15) NOT NULL,
    cep VARCHAR(8) NOT NULL,
    city VARCHAR(255) NOT NULL,
    state VARCHAR(127) NOT NULL,
    CONSTRAINT pk_person PRIMARY KEY (id)
);