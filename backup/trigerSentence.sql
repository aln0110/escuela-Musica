DELIMITER //

CREATE TRIGGER afterMatriculaInsert
AFTER INSERT ON tbmatricula
FOR EACH ROW
BEGIN
    INSERT INTO tbmatriculadetalle (tbmatriculadetallematriculaid, tbmatriculadetallenota, tbmatriculadetalleestado)
    VALUES (NEW.tbmatriculaid, 0.0, 1);  
END//

DELIMITER ;

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
