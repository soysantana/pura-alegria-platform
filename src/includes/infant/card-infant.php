<!-- Tarjeta del infante -->
<div class="px-5 py-4 sm:px-6 mb-6 rounded-2xl border border-gray-200 bg-white shadow-sm dark:border-gray-800 dark:bg-white/[0.03]">
    <div class="flex items-center gap-4">
        <div class="h-[50px] w-[50px] overflow-hidden rounded-full">
            <img src="/src/uploads/<?php echo remove_junk($infant['infant_picture']); ?>" alt="Infant" />
        </div>

        <div>
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white">
                <?php echo remove_junk(ucfirst($infant['infant_name'])); ?>
            </h3>
        </div>
    </div>
</div>