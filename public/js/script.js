// Configuración inicial de Three.js
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

// Cámara inicial
camera.position.z = 5;

// Lista de stands con información y posición
const stands = [
    { name: 'Stand 1', image: '/img/stand1.jpg', position: new THREE.Vector3(-2, 0, 0) },
    { name: 'Stand 2', image: '/img/stand2.jpg', position: new THREE.Vector3(0, 0, 0) },
    { name: 'Stand 3', image: '/img/stand3.jpg', position: new THREE.Vector3(2, 0, 0) }
];

// Crear stands e interacción
const raycaster = new THREE.Raycaster();
const mouse = new THREE.Vector2();
const clickableObjects = [];

stands.forEach((standInfo) => {
    const geometry = new THREE.PlaneGeometry(1.5, 1);
    const texture = new THREE.TextureLoader().load(standInfo.image);
    const material = new THREE.MeshBasicMaterial({ map: texture });
    const stand = new THREE.Mesh(geometry, material);

    stand.position.copy(standInfo.position);
    scene.add(stand);
    clickableObjects.push(stand);

    stand.onClick = () => {
        alert(`Información sobre ${standInfo.name}`);
    };
});

// Función para detectar clics
document.addEventListener('click', (event) => {
    const rect = renderer.domElement.getBoundingClientRect();
    mouse.x = ((event.clientX - rect.left) / rect.width) * 2 - 1;
    mouse.y = -((event.clientY - rect.top) / rect.height) * 2 + 1;

    raycaster.setFromCamera(mouse, camera);
    const intersects = raycaster.intersectObjects(clickableObjects);

    if (intersects.length > 0) {
        const clickedObject = intersects[0].object;
        if (clickedObject.onClick) {
            clickedObject.onClick();
        }
    }
});

// Animación de renderizado
const animate = () => {
    requestAnimationFrame(animate);
    renderer.render(scene, camera);
};

animate();
