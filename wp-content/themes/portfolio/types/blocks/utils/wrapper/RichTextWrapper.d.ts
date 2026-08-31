
/**
 * types/utils/wrapper/RichTextWrapper.d.ts
 * Minimal TypeScript declarations for the project's RichTextWrapper component.
 */
declare interface RichTextWrapperProps<T extends keyof JSX.IntrinsicElements = 'span'> {
  tagName?: T | string;
  value?: string;
  onChange?: ((value: string) => void) | null;
  placeholder?: string;
  className?: string;
  // allow passing other common element props (aria, id, style, etc.)
  [key: string]: any;
}

declare const RichTextWrapper: React.ComponentType<RichTextWrapperProps>;
