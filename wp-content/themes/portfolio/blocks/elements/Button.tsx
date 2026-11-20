export default function Button({ variant = "primary", button }: ButtonProps) {
    const variantStyles = {
        "primary": "bg-white text-slate-950 hover:bg-slate-200",
        "secondary": "border border-white/20 text-white hover:bg-white/10",
    };

    return (
        <a className={`inline-flex items-center justify-center rounded-full px-6 py-4 text-sm font-semibold transition ${variantStyles[variant]}`} href={button.href} target={button.target}>
            <span>{button.label}</span>
        </a>
    );
}
