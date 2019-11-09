
DROP DATABASE IF EXISTS mrRentWEB;
create database mrRentWEB;
use mrRentWEB;

CREATE TABLE USUARIO(

    ID_USUARIO INT NOT NULL AUTO_INCREMENT,
    NOMBRE VARCHAR(20),
    CONTRA VARCHAR(20),
    PRIMARY KEY(ID_USUARIO)
);

CREATE TABLE DISCO(
    ID_DISCO INT NOT NULL AUTO_INCREMENT,
    ID_PELICULA INT,
    ELIMINADO CHAR,
    DISPONIBLE CHAR,
    PRIMARY KEY(ID_DISCO)
);

CREATE TABLE PELICULA(
    ID_PELICULA INT NOT NULL AUTO_INCREMENT,
    ID_ESTUDIO INT,
    DURACION INT,
    CLASIFICACION VARCHAR(2),
    SINOPSIS VARCHAR(600),
    COSTO_RENTA FLOAT,
    NOMBRE VARCHAR(60),
    ELIMINADO CHAR,
    PRIMARY KEY(ID_PELICULA)
);

CREATE TABLE ESTUDIO(
    ID_ESTUDIO INT AUTO_INCREMENT NOT NULL,
    NOMBRE VARCHAR(30),
    ELIMINADO CHAR,
    PRIMARY KEY(ID_ESTUDIO)
);


/* ======================================================= Foreign Keys ===================================================================*/


    ALTER TABLE DISCO ADD FOREIGN KEY(ID_PELICULA) REFERENCES PELICULA(ID_PELICULA);

    ALTER TABLE PELICULA ADD FOREIGN KEY(ID_ESTUDIO) REFERENCES ESTUDIO(ID_ESTUDIO);


/* ======================================================= Llenar tablas ===================================================================*/



    INSERT INTO ESTUDIO VALUES (0,"Marvel Studios",'N');
    INSERT INTO ESTUDIO VALUES (0,"DC Studios",'N');
    INSERT INTO ESTUDIO VALUES (0,"Disney Studios",'N');
    INSERT INTO ESTUDIO VALUES (0,"CajaObscura Films",'N');
    INSERT INTO ESTUDIO VALUES (0,"Netflix Studios",'N');


    INSERT INTO PELICULA VALUES (0,1,124,'B',"En marzo de 1942, el oficial nazi Johann Schmidt y sus hombres entran a la ciudad de Tønsberg en una Noruega ocupada por los alemanes nazi, para robar una misteriosa reliquia llamada el Teseracto que posee poderes incalculables. Mientras tanto, en Nueva York, Steve Rogers es rechazado por el reclutamiento militar de la Segunda Guerra Mundial debido a varios problemas de salud física.",30,"Capitain America: The First Avenger",'N');
    INSERT INTO PELICULA VALUES(0,1,181,'B',"Gracias al chasquido de Thanos el mundo sufre lo que llama la ejecución, debido a que la mitad de población desapareció en un instante. Eso incluyó a héroes como Spider-Man, Star-Lord, Scarlet Witch,el Soldado del Invierno, Groot y otros. Como vimos en el primer tráiler, los que quedaron deben arreglar lo que Thanos rompió, juntando a los Vengadores que quedaron y a nuevos aliados para ir a la batalla contra el Titan Loco.",59,"Avengers: Endgame",'N');
    INSERT INTO PELICULA VALUES(0,1,131,'B',"El descarado y brillante Tony Stark, tras ver destruido todo su universo personal, debe encontrar y enfrentarse a un enemigo cuyo poder no conoce límites. Este viaje pondrá a prueba su entereza una y otra vez, y le obligará a confiar en su ingenio.",30,"Iron Man 3",'N');

    /*ELIMINADO, DISPONIBLE*/
    INSERT INTO DISCO VALUES(0,1,'N','S');
    INSERT INTO DISCO VALUES(0,1,'N','S');
    INSERT INTO DISCO VALUES(0,2,'N','S');

    INSERT INTO USUARIO VALUES(0,"admin","admin");

/* ======================================================= Procedimientos almacenados ===================================================================*/


    /*Ver todos los discos*/
        CREATE OR REPLACE PROCEDURE verDiscos()
        select id_disco, pelicula.nombre as "Pelicula" from disco
        inner join pelicula on disco.id_pelicula = pelicula.id_pelicula where disco.eliminado = 'N' order by id_disco;

    /* Ver un disco en específico */
        CREATE OR REPLACE PROCEDURE consultarDisco(IN idDisco INT)
        select id_disco as "No. de disco", pelicula.nombre as "Pelicula", disponible as "Disco disponible?" from disco
        inner join pelicula on disco.id_pelicula = pelicula.id_pelicula where id_disco = idDisco;

    /*Consultar todas las películas del sistema sirve para el DataGridView*/
        CREATE OR REPLACE PROCEDURE verPeliculas() 
        select id_pelicula as "ID_PELICULA", ESTUDIO.nombre as "Estudio", 
        duracion as "Duracion", CLASIFICACION as "Clasificacion", COSTO_RENTA as "Costo por dia de renta", 
        pelicula.nombre as "Titulo" from pelicula inner join estudio on pelicula.ID_ESTUDIO = estudio.ID_ESTUDIO where pelicula.eliminado = 'N';

    /*Consultar una película en específico. Se usa para la vista AgregarYModificarPelícula a la hora de modificar la pelicula*/
        CREATE OR REPLACE PROCEDURE consultarPelicula(IN idPelicula INT) 
        select id_pelicula as "id_pelicula", ESTUDIO.nombre as "estudio", 
        duracion as "Duracion", CLASIFICACION as "Clasificacion", COSTO_RENTA as "costo", sinopsis,
        pelicula.nombre as "nombre" from pelicula inner join estudio on pelicula.ID_ESTUDIO = estudio.ID_ESTUDIO 
        where id_pelicula = idPelicula;

    /*Ver todos los estudios*/
        CREATE OR REPLACE PROCEDURE verEstudios()
        select id_estudio as "ID_ESTUDIO", estudio.nombre as "ESTUDIO" FROM ESTUDIO where ELIMINADO = 'N';
