<script setup>

</script>

<template>
    <div class="d-flex flex-column min-vh-100 bg-light-subtle">
        <header class="text-bg-dark py-4">
            <div class="container text-light text-center">
                <a class="text-decoration-none text-white" href="#">
                    <slot name="header">
                        <h1>Header</h1>
                    </slot>

                </a>
            </div>
        </header>
        <main class="container h-100">
            <slot name="main">
                Template empty
            </slot>
        </main>
        <div class="container mt-auto">
            <footer>
                <slot name="footer">
                    <div class="my-2 border-bottom"></div>
                    <p class="text-center text-body-secondary mt-2 mb-5">Made by Matt</p>
                </slot>
            </footer>
        </div>
    </div>
</template>