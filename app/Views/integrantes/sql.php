<?php include(APPPATH . 'Views/templates/head.php'); ?>
<div class="row">
    <div class="col">
        <div class="card border-warning mt-3">
            <div class="card-header">
                <h2 class="text-warning">Código SQL <i class="fa-solid fa-database"></i></h2>
            </div>
            <div class="card-body">
                <pre>
                    <code class="language-sql">
    CREATE DATABASE bandas;

    USE bandas;

    CREATE TABLE generos(
        genero_id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50)
    );

    CREATE TABLE paises(
        pais_id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(100)
    );

    CREATE TABLE integrantes(
        integrante_id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        apellido VARCHAR(50),
        fecha_nacimiento DATE,
        fecha_muerte DATE NULL,
        web_oficial VARCHAR(50) NULL,
        pais_id INT,
        CONSTRAINT FOREIGN KEY (pais_id) REFERENCES paises (pais_id) ON UPDATE CASCADE ON DELETE CASCADE
    );

    CREATE TABLE grupos(
        grupo_id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50),
        fecha_formaciono DATE,
        fecha_desintegracion DATE NULL
    );

    CREATE TABLE generos_grupos(
        generos_grupos_id INT AUTO_INCREMENT PRIMARY KEY,
        genero_id INT,
        grupo_id INT,
        CONSTRAINT FOREIGN KEY (genero_id) REFERENCES generos (genero_id) ON UPDATE CASCADE ON DELETE CASCADE,
        CONSTRAINT FOREIGN KEY (grupo_id) REFERENCES grupos (grupo_id) ON UPDATE CASCADE ON DELETE CASCADE
    );

    CREATE TABLE integrantes_grupos(
        integrante_grupo_id INT AUTO_INCREMENT PRIMARY KEY,
        grupo_id INT,
        integrante_id INT,
        fecha_ingreso DATE,
        fecha_retiro DATE NULL,
        instrumento VARCHAR(30),
        CONSTRAINT FOREIGN KEY (grupo_id) REFERENCES grupos (grupo_id) ON UPDATE CASCADE ON DELETE CASCADE,
        CONSTRAINT FOREIGN KEY (integrante_id) REFERENCES integrantes (integrante_id) ON UPDATE CASCADE ON DELETE CASCADE
    );
                    </code>
                </pre>
            </div>
        </div>
    </div>
</div>
<?php include(APPPATH . 'Views/templates/foot.php'); ?>