const estudiantes = [
    {Nombre: "Juan", Apellido: "Perez", Email: "juan.perez@example.com", Curso: "Programación"},
    {Nombre: "Andres", Apellido: "Gonzales", Email: "andres.gonzales@example.com", Curso: "Química"},
    {Nombre: "Pablo", Apellido: "Coto", Email: "pablo.coto@example.com", Curso: "Programación"}
];

let tabla_estudiantes = document.getElementById("tabla_estudiantes");

estudiantes.forEach((estudiante, index) => {
    tabla_estudiantes.innerHTML += `
        <tr>
            <td>${index + 1}</td>
            <td>${estudiante.Nombre} ${estudiante.Apellido}</td>
            <td>${estudiante.Email}</td>
            <td>${estudiante.Curso}</td>
        </tr>
    `;
});
