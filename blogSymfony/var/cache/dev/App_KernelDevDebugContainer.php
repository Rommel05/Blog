<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container5o8IORX\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container5o8IORX/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/Container5o8IORX.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\Container5o8IORX\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \Container5o8IORX\App_KernelDevDebugContainer([
    'container.build_hash' => '5o8IORX',
    'container.build_id' => 'abef1fdc',
    'container.build_time' => 1728284113,
], __DIR__.\DIRECTORY_SEPARATOR.'Container5o8IORX');
