declare interface IHeroBannerAttributes {
  badge?: string;
  title?: string;
  subtitle?: string;
  primaryButton?: IButton
  secondaryButton?: IButton
}

declare interface IHeroBannerAttributesState {
  attributes: IHeroBannerAttributes,
  setAttributes?: Function
};
