function show_3d1() {
    
    import * as THREE from 'https://threejsfundamentals.org/threejs/resources/threejs/r127/build/three.module.js';
    import {OrbitControls} from 'https://threejsfundamentals.org/threejs/resources/threejs/r127/examples/jsm/controls/OrbitControls.js';
    import {GLTFLoader} from 'https://threejsfundamentals.org/threejs/resources/threejs/r127/examples/jsm/loaders/GLTFLoader.js';

            function main() {
                const canvas = document.querySelector('./3d_custom.html/#c');
                const renderer = new THREE.WebGLRenderer({canvas});

                const fov = 45;
                const aspect = 2;  // the canvas default
                const near = 0.1;
                const far = 100;
                const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
                camera.position.set(0, 10, 20);

                const controls = new OrbitControls(camera, canvas);
                controls.target.set(0, 5, 0);
                controls.update();

                const scene = new THREE.Scene();
                scene.background = new THREE.Color('#fffff0'); //배경색

                {
                    const planeSize = 40; //바닥 사이즈 결정

                    const loader = new THREE.TextureLoader();
                    const texture = loader.load('https://threejsfundamentals.org/threejs/resources/images/checker.png'); //바닥 이미지
                    texture.wrapS = THREE.RepeatWrapping;
                    texture.wrapT = THREE.RepeatWrapping;
                    texture.magFilter = THREE.NearestFilter;
                    const repeats = planeSize / 20; //체크 바닥 사용할거면 필요
                    texture.repeat.set(repeats, repeats);

                    const planeGeo = new THREE.PlaneGeometry(planeSize, planeSize);
                    const planeMat = new THREE.MeshPhongMaterial({
                        map: texture,
                        side: THREE.DoubleSide
                    });
                    //아래 코드 지우면 바닥 없어짐
                    // const mesh = new THREE.Mesh(planeGeo, planeMat);
                    // mesh.rotation.x = Math.PI * -.5;
                    // scene.add(mesh);
                }

                //바닥색 설정
                {
                    const skyColor = 0xB1E1FF;  // light blue
                    const groundColor = 0xB97A20;  // brownish orange(바닥 밑면)
                    const intensity = 1;
                    const light = new THREE.HemisphereLight(skyColor, groundColor, intensity);
                    scene.add(light);
                }

                //light 색 설정
                {
                    const color = 0xFFFFFF;
                    const intensity = 1;
                    const light = new THREE.DirectionalLight(color, intensity);
                    light.position.set(5, 10, 2);
                    scene.add(light);
                    scene.add(light.target);
                }

                //3D 모델 불러오는 코드
                const gltfLoader = new GLTFLoader();
                gltfLoader.load('./3D/2step_cake_decoration.glb', (gltf) => {
                    const root = gltf.scene;
                    scene.add(root); //여기까지
                });

                function resizeRendererToDisplaySize(renderer) {
                    const canvas = renderer.domElement;
                    const width = canvas.clientWidth;
                    const height = canvas.clientHeight;
                    const needResize = canvas.width !== width || canvas.height !== height;
                    if (needResize) {
                        renderer.setSize(width, height, false);
                    }
                    return needResize;
                }

                function render() {
                    if (resizeRendererToDisplaySize(renderer)) {
                        const canvas = renderer.domElement;
                        camera.aspect = canvas.clientWidth / canvas.clientHeight;
                        camera.updateProjectionMatrix();
                    }
                    renderer.render(scene, camera);
                    requestAnimationFrame(render);
                }
                requestAnimationFrame(render);
            }
            main();
}

function show_3d2() {
    import * as THREE from 'https://threejsfundamentals.org/threejs/resources/threejs/r127/build/three.module.js';
    import {OrbitControls} from 'https://threejsfundamentals.org/threejs/resources/threejs/r127/examples/jsm/controls/OrbitControls.js';
    import {GLTFLoader} from 'https://threejsfundamentals.org/threejs/resources/threejs/r127/examples/jsm/loaders/GLTFLoader.js';

            function main() {
                const canvas = document.querySelector('#c');
                const renderer = new THREE.WebGLRenderer({canvas});

                const fov = 45;
                const aspect = 2;  // the canvas default
                const near = 0.1;
                const far = 100;
                const camera = new THREE.PerspectiveCamera(fov, aspect, near, far);
                camera.position.set(0, 10, 20);

                const controls = new OrbitControls(camera, canvas);
                controls.target.set(0, 5, 0);
                controls.update();

                const scene = new THREE.Scene();
                scene.background = new THREE.Color('#fffff0'); //배경색

                {
                    const planeSize = 40; //바닥 사이즈 결정

                    const loader = new THREE.TextureLoader();
                    const texture = loader.load('https://threejsfundamentals.org/threejs/resources/images/checker.png'); //바닥 이미지
                    texture.wrapS = THREE.RepeatWrapping;
                    texture.wrapT = THREE.RepeatWrapping;
                    texture.magFilter = THREE.NearestFilter;
                    const repeats = planeSize / 20; //체크 바닥 사용할거면 필요
                    texture.repeat.set(repeats, repeats);

                    const planeGeo = new THREE.PlaneGeometry(planeSize, planeSize);
                    const planeMat = new THREE.MeshPhongMaterial({
                        map: texture,
                        side: THREE.DoubleSide
                    });
                    //아래 코드 지우면 바닥 없어짐
                    // const mesh = new THREE.Mesh(planeGeo, planeMat);
                    // mesh.rotation.x = Math.PI * -.5;
                    // scene.add(mesh);
                }

                //바닥색 설정
                {
                    const skyColor = 0xB1E1FF;  // light blue
                    const groundColor = 0xB97A20;  // brownish orange(바닥 밑면)
                    const intensity = 1;
                    const light = new THREE.HemisphereLight(skyColor, groundColor, intensity);
                    scene.add(light);
                }

                //light 색 설정
                {
                    const color = 0xFFFFFF;
                    const intensity = 1;
                    const light = new THREE.DirectionalLight(color, intensity);
                    light.position.set(5, 10, 2);
                    scene.add(light);
                    scene.add(light.target);
                }

                //3D 모델 불러오는 코드
                const gltfLoader = new GLTFLoader();
                gltfLoader.load('./3D/basic_cylinder_cake.glb', (gltf) => {
                    const root = gltf.scene;
                    scene.add(root); //여기까지
                });

                function resizeRendererToDisplaySize(renderer) {
                    const canvas = renderer.domElement;
                    const width = canvas.clientWidth;
                    const height = canvas.clientHeight;
                    const needResize = canvas.width !== width || canvas.height !== height;
                    if (needResize) {
                        renderer.setSize(width, height, false);
                    }
                    return needResize;
                }

                function render() {
                    if (resizeRendererToDisplaySize(renderer)) {
                        const canvas = renderer.domElement;
                        camera.aspect = canvas.clientWidth / canvas.clientHeight;
                        camera.updateProjectionMatrix();
                    }
                    renderer.render(scene, camera);
                    requestAnimationFrame(render);
                }
                requestAnimationFrame(render);
            }
            main();
}

function show_3d3() {

}