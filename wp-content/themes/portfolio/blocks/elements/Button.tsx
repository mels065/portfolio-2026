export default function Button({ variant = "primary", button }: ButtonProps) {
    const variantStyles = {
        "primary": "inline-flex items-center justify-center rounded-full bg-white px-6 py-4 text-sm font-semibold text-slate-950 transition hover:bg-slate-200",
        "secondary": "inline-flex items-center justify-center rounded-full border border-white/20 px-6 py-4 text-sm font-semibold text-white transition hover:bg-white/10",
    };

    return (
        <a href={button.href} target={button.target} className={variantStyles[variant]}>
            <span>{button.label}</span>
        </a>
    );
}
