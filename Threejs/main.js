import * as THREE from 'three';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';

const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );
const loader = new GLTFLoader();

const renderer = new THREE.WebGLRenderer();
renderer.setSize( window.innerWidth, window.innerHeight );
document.body.appendChild( renderer.domElement );

const geometry = new THREE.BoxGeometry( 2, 2, 2 );
const material = new THREE.MeshBasicMaterial( { color: "#FFBB64"} );
const cube = new THREE.Mesh( geometry, material );
scene.add( cube );


camera.position.z = 5;


const onMouseMove = (event) => {
    // Normalize mouse coordinates
    const mouseX = (event.clientX / window.innerWidth) * 2 - 1;
    const mouseY = -(event.clientY / window.innerHeight) * 2 + 1;

    // Update cube rotation based on mouse position
    cube.rotation.x = mouseY * 2;
    cube.rotation.y = mouseX * 2;
  };

  // Add mouse move event listener
  document.addEventListener('mousemove', onMouseMove, false);

  // Animation loop
  const animate = () => {
    requestAnimationFrame(animate);

    // Render the scene
    renderer.render(scene, camera);
  };

  animate();

