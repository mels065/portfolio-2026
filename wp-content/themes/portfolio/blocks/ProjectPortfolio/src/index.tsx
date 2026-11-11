import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
import { PanelBody, TextControl } from '@wordpress/components';

registerBlockType('portfolio/project-portfolio', {
  edit: ({ attributes = { title: 'Projects' }, setAttributes }: IProjectPortfolioAttributesState) => {
    return (
      <>
        <InspectorControls>
          <PanelBody title="Content">
            <TextControl
              label="Title"
              value={attributes.title}
              onChange={(value: string) => setAttributes({ title: value })}
            />
          </PanelBody>
        </InspectorControls>
        <div {...useBlockProps()}>
          <ServerSideRender
            block="portfolio/project-portfolio"
            attributes={attributes}
          />
        </div>
      </>
    );
  },

  save: () => null,
});
