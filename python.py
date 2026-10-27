print("Hola mundo prueba")
#esto es un comentario
rol = "MoodleAdmin"
print(rol)
#variable nueva llamada curso
curso = "Python para admins"
print(curso)

#cadenas concatenadas
alumnos_inscritos = 25
nombre_curso = "GestiónMoodle"
print(f"Hola, los alumnos inscritos son {alumnos_inscritos} y el nombre del curso es {nombre_curso}.")

#operaciones matemáticas
capacidad_maxima = 50
alumnos_actuales = 32
cupos_disponibles = capacidad_maxima - alumnos_actuales
print(f"Los cupos disponibles que quedan son {cupos_disponibles}")
#condicionales
if cupos_disponibles>0:
    print("Se aceptan inscripciones")
else:
    print("está cerrado")

rol_usuario = "profesor"
if rol_usuario =="profesor":
    print("Acceso concedido: Puedes crear cursos.")
else:
    print("Acceso denegado: Solo los profesores pueden crear cursos.")

alumnos = 0
if alumnos == 0:
    print("El curso no tiene inscritos.")
elif alumnos < 10:
    print("el curso tiene pocos alumnos")
else:
    print("El curso tiene un buen grupo de alumnos.")

#Listas, equivalente a arrays en PHP
modulos = ["Módulo 1: Introducción", "Módulo 2: Configuración", "Módulo 3: Exámenes"]
totalmodulos = len(modulos)
print(f"en este array hay un total de {totalmodulos} módulos")

#bucles
nuevos_alumnos = ["Carlos", "Elena", "Sofia"]
for alumno in nuevos_alumnos:
    print(f"Bienvenido a Moodle {alumno}")

#añadir alementos modificando un array o lista con .append()
modulos = ["Módulo 1", "Módulo 2"]
modulos.append("Módulo 3: Examen Final")
for modulo in modulos:
    print(f"Este módulo se llama {modulo}")

#Diccionario como array asociativo
curso_info = {
    "nombre": "Python para Administradores",
    "categoria": "Programación",
    "alumnos": 45,
}
print(f"El curso {curso_info['nombre']} pertenece a la categoría {curso_info['categoria']} y tiene {curso_info['alumnos']} alumnos.")

#funciones def, como en php function
def notificar_curso(nombre_curso):
    print(f"el curso {nombre_curso} ha sido publicado con éxito")

notificar_curso("Excel Avanzado")
notificar_curso("python Moodle")
#def con return
def obtener_cupos_libres(capacidad, inscritos):
    resta = capacidad - inscritos
    return resta
disponibles = obtener_cupos_libres(60, 42)
print(f"quedan {disponibles} plazas disponibles")
#python transforma json en listas y diccionarios. json es javascript object notation. Texto plano universal.
import json
respuesta_moodle = '{"nombre": "Carlos", "rol": "Profesor", "cursos_activos": 3}'
usuario = json.loads(respuesta_moodle)
print(f"El usuario {usuario['nombre']} tiene el rol de {usuario['rol']}.")
alumnos_excel = [
    {"nombre": "Lucía", "curso": "Python Básico"},
    {"nombre": "Marcos", "curso": "Python Básico"}
]
for alumno in alumnos_excel:
    print(f"Matriculando a {alumno['nombre']} en el curso {alumno['curso']}")
#try/excepts
numero = 0
try:
    resultado = 10 / numero
    print(resultado)
except:
    print("No se puede dividir entre cero.")
#ejemplo de descarga de notars finales en excel usando python
notas = [
    {"Alumno": "Ana", "Nota": 9},
    {"Alumno": "Pedro", "Nota": 4}
]
try:
    print("Descargando notas...")
    df=pd.DataFrame(notas)
    df.to_excel("notas_finales.xlsx", index=False) #index=False se crea para indicar a python que no se genere una columna extra con indices id por cada alumno o registro, si se pone index=True se crea una columna con números asociando un orden.
except:
    print("Se ha producido un error")
#segunda prueba generando un archivo
import pandas as pd
cursos = [
    {"Curso": "Moodle Admin", "Horas": 40},
    {"Curso": "Python Básico", "Horas": 20}
]
df = pd.DataFrame(cursos) #esto sigue en la siguiente línea:
df.to_excel("mis_cursos.xlsx", index=False)
#herramienta libreria
import random
dado = random.randint(1,6)
print(f"Has obtenido un {dado}")
#herramienta datetime
from datetime import datetime
ahora = datetime.now()
anio = ahora.strftime("%Y")
print(f"Reporte del año {anio}")
#comprobar si un archivo existe o no usamos la función os.path.exists(nombre_archivo)
import os
nombre_archivo = "notas_moodle.xlsx"
if os.path.exists(nombre_archivo):
    print("Abriendo archivo de notas...")
else:
    print("No se encontró el archivo de notas.")

#misma función pero ahora para gestionar carpetas
import os
nombre_carpeta = "diplomas_alumnos"
if not os.path.exists(nombre_carpeta):
    os.makedirs(nombre_carpeta)
    print("Carpeta creada con éxito")
else: 
    print("La carpeta ya existe")

#guardar archivos en la carpeta creada
import pandas as pd
ruta = "diplomas_alumnos/diploma_lucia.xlsx"
tabla_alumnos.to_excel(ruta, index=False)

#listar archivos dentro de una carpeta