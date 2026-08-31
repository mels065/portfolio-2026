declare interface IButton {
    label: string;
    href: string;
    target: "_self" | "_blank";
}

declare interface ButtonProps {
    variant?: "primary" | "secondary";
    button: IButton;
}
