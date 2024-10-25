import * as THREE from "three";
import { OrbitControls } from "three/addons/controls/OrbitControls.js";
import { GLTFLoader } from "three/addons/loaders/GLTFLoader.js";

// Instancia de la escena
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
  75,
  window.innerWidth / window.innerHeight,
  0.1,
  1000
);
const renderer = new THREE.WebGLRenderer();

// Selecciona el contenedor del HTML donde se renderizará el objeto 3D
const container = document.getElementById("3d-container");
const containerWidth = container.clientWidth;
const containerHeight = container.clientHeight;

// Establece el tamaño del renderizado al tamaño del contenedor
renderer.setSize(containerWidth, containerHeight);
container.appendChild(renderer.domElement);

// Agrega controles de órbita para que el objeto sea interactivo
const controls = new OrbitControls(camera, renderer.domElement);

// Luz de ambiente para iluminar la escena de manera uniforme
const ambientLight = new THREE.AmbientLight(0x404040, 20); // Luz tenue
scene.add(ambientLight);

// Luz direccional para agregar sombras y resaltado
const directionalLight = new THREE.DirectionalLight(0xffffff, 20); // Luz blanca intensa
scene.add(directionalLight);

// Carga el modelo GLTF usando el GLTFLoader
const loader = new GLTFLoader();
let montblancModel; // Variable para almacenar el modelo
let sauvageDiorModel; // Variable para almacenar el segundo modelo

// Cargar modelo Montblanc
loader.load(
    "/Montblanc.glb",
    function (gltf) {
      const model1 = gltf.scene;
      model1.scale.set(0.5, 0.5, 0.5);
      model1.position.set(0, 0, 0);
      document.getElementById("model1").appendChild(model1); // Añade el modelo al contenedor
    },
    undefined,
    function (error) {
      console.error("Error al cargar el modelo 1:", error);
    }
  );

  loader.load(
    "/Sauvage_Dior.glb",
    function (gltf) {
      const model2 = gltf.scene;
      model2.scale.set(0.5, 0.5, 0.5);
      model2.position.set(0, 0, 0);
      document.getElementById("model2").appendChild(model2); // Añade el modelo al contenedor
    },
    undefined,
    function (error) {
      console.error("Error al cargar el modelo 2:", error);
    }
  );


  loader.load(
    "/perfume.glb", // Reemplaza con tu modelo
    function (gltf) {
      const model3 = gltf.scene;
      model3.scale.set(0.5, 0.5, 0.5);
      model3.position.set(0, 0, 0);
      document.getElementById("model3").appendChild(model3); // Añade el modelo al contenedor
    },
    undefined,
    function (error) {
      console.error("Error al cargar el modelo 3:", error);
    }
  );

// Configura la posición inicial de la cámara
camera.position.z = 5;

// Función de animación para renderizar la escena continuamente
function animate() {
  requestAnimationFrame(animate);

  // Opcional: rotar el modelo para darle movimiento
  if (montblancModel) {
    montblancModel.rotation.y += 0.01; // Rotación lenta en el eje Y
  }
  if (sauvageDiorModel) {
    sauvageDiorModel.rotation.y += 0.01; // Rotación lenta en el eje Y
  }

  controls.update(); // Actualiza los controles
  renderer.render(scene, camera);
}

// Llama a la función de animación
animate();

// Ajustar el tamaño del renderizado si la ventana del navegador cambia de tamaño
window.addEventListener("resize", () => {
  const containerWidth = container.clientWidth;
  const containerHeight = container.clientHeight;

  renderer.setSize(containerWidth, containerHeight);
  camera.aspect = containerWidth / containerHeight;
  camera.updateProjectionMatrix();
});
