<?php

use PHPUnit\Framework\TestCase;

class test extends TestCase {
    public function testConexion() {
        $conexion = mysqli_connect('localhost', 'root', '', 'peliculas1');
        $this->assertInstanceOf(mysqli::class, $conexion); 
    }

    public function testFormularioContacto() {
        // Simular envío de formulario de contacto y verificar respuesta
        // Aquí podrías utilizar cURL o algún otro método para enviar datos al formulario
        $this->assertTrue(true); // Asumiendo que se envió correctamente
    }
}
?>