
--crear matriculas 
DELIMITER //

CREATE TRIGGER afterMatriculaInsert
AFTER INSERT ON tbmatricula
FOR EACH ROW
BEGIN
    INSERT INTO tbmatriculadetalle (tbmatriculadetallematriculaid, tbmatriculadetallenota, tbmatriculadetalleestado)
    VALUES (NEW.tbmatriculaid, 0.0, 1);  
END//

DELIMITER ;


--deletos logicos
DELIMITER //

CREATE TRIGGER afterMatriculaUpdate
AFTER UPDATE ON tbmatriculadetalle
FOR EACH ROW
BEGIN

    IF OLD.tbmatriculadetalleestado <> NEW.tbmatriculadetalleestado THEN
        IF NEW.tbmatriculadetalleestado = 1 THEN

            UPDATE tbmatricula
            SET tbmatriculaactivo = 1 
            WHERE tbmatriculaid = OLD.tbmatriculadetallematriculaid;  --
        ELSEIF NEW.tbmatriculadetalleestado = 0 THEN

            UPDATE tbmatricula
            SET tbmatriculaactivo = 0 
            WHERE tbmatriculaid = OLD.tbmatriculadetallematriculaid;  
        END IF;
    END IF;
END //

DELIMITER ;






--sentencia diabolica del select 
SELECT 
    d.tbmatriculadetalleid,
    d.tbmatriculadetallenota,
    d.tbmatriculadetalleestado,
    m.tbmatriculaid,
    m.tbmatriculaactivo,
    e.tbEstudianteNombre,
    e.tbEstudianteApellidos,
    c.tbcursonombre,
    c.tbcursosigla,
    c.tbcursogrupo,
    p.tbprofesornombre,
    p.tbprofesorapellidos,
    ci.tbciclonombre
FROM 
    tbmatriculadetalle d
JOIN 
    tbmatricula m ON d.tbmatriculadetallematriculaid = m.tbmatriculaid
JOIN 
    tbestudiante e ON m.tbmatriculaestudiante = e.tbestudianteid
JOIN 
    tbcurso c ON m.tbmatriculacurso = c.tbcursoid
JOIN 
    tbprofesor p ON c.tbcursoidprofesor = p.tbprofesorid
JOIN 
    tbciclo ci ON c.tbcursoidciclo = ci.tbcicloid
WHERE 
    m.tbmatriculaestudiante = 1; 


    INSERT into tbmatriculadetalle (0, 1, 80, 1)
    INSERT into tbmatriculadetalle (0, 2, 80, 1)
