CREATE TABLE Tema (
    codice INT PRIMARY KEY,
    descrizione TEXT NOT NULL
);

CREATE TABLE Sala (
    numero INT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    superficie INT NOT NULL,
    temaSala INT,
    FOREIGN KEY (temaSala) REFERENCES Tema(codice)
);

CREATE TABLE Autore (
    codice INT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    cognome VARCHAR(50) NOT NULL,
    nazione VARCHAR(50) NOT NULL,
    dataNascita DATE NOT NULL,
    tipo ENUM('vivo', 'morto') NOT NULL,
    dataMorte DATE DEFAULT NULL,
    CHECK (
        (tipo = 'vivo' AND dataMorte IS NULL) OR
        (tipo = 'morto' AND dataMorte IS NOT NULL)
    )
);

CREATE TABLE Opera (
    codice INT PRIMARY KEY,
    autore INT,
    titolo VARCHAR(100) NOT NULL,
    annoAcquisto INT NOT NULL,
    annoRealizzazione INT NOT NULL,
    tipo ENUM('Quadro', 'Scultura') NOT NULL,
    espostaInSala INT,
    FOREIGN KEY (autore) REFERENCES Autore(codice),
    FOREIGN KEY (espostaInSala) REFERENCES Sala(numero)
);
