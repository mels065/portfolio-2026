/**
 * Minimal TypeScript declaration stubs for common WordPress packages
 * Place this file in `types/wp-declarations.d.ts` and ensure tsconfig `typeRoots` includes "./types"
 */

declare module '@wordpress/blocks' {
  export function registerBlockType(name: string, settings: any): void;
  export interface BlockSettings {
    [key: string]: any;
  }
  const _default: any;
  export default _default;
}

declare module '@wordpress/block-editor' {
  import * as React from 'react';

  export type BlockProps = { [key: string]: any };

  export interface UseBlockPropsFunction {
    (props?: any): BlockProps;
    save(props?: any): BlockProps;
  }
  export const useBlockProps: UseBlockPropsFunction;
  export const InspectorControls: React.ComponentType<any>;
  export const BlockControls: React.ComponentType<any>;
  export const RichText: any;
  export const MediaPlaceholder: React.ComponentType<any>;
  export default any;
}

declare module '@wordpress/components' {
  import * as React from 'react';

  export const PanelBody: React.ComponentType<any>;
  export const SelectControl: React.ComponentType<any>;
  export const TextControl: React.ComponentType<any>;
  export const TextareaControl: React.ComponentType<any>;
  export const Button: React.ComponentType<any>;
  export default any;
}

declare module '@wordpress/i18n' {
  export function __(text: string, domain?: string): string;
  export function _x(text: string, context: string, domain?: string): string;
  export function sprintf(format: string, ...args: any[]): string;
}

declare module '*.scss' {
  const classes: { readonly [key: string]: string };
  export default classes;
}